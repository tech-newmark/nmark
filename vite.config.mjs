// vite.config.js

import { defineConfig } from "vite";
import path from "path";
import fs from "fs";
import svgSpritemap from "vite-plugin-svg-spritemap";
import vue from "@vitejs/plugin-vue";

// Базовые пути
const TEMPLATE_PATH = "local/templates/nmark";
const BASE_PATH = `/${TEMPLATE_PATH}`;
const DIST_PATH = `${TEMPLATE_PATH}`;
const COMPONENTS_PATH = `${TEMPLATE_PATH}/components/bitrix`;

// Вспомогательная функция: безопасное чтение файла
const fileExists = (filePath) => {
  try {
    return fs.statSync(filePath).isFile();
  } catch {
    return false;
  }
};

// Рекурсивный поиск компонентов с __vite__/scss/index.scss или __vite__/js/index.js
function findComponentDirs(baseDir) {
  const components = [];

  function walk(currentDir) {
    let files;
    try {
      files = fs.readdirSync(currentDir);
    } catch {
      return;
    }

    for (const file of files) {
      const fullPath = path.join(currentDir, file);
      const stat = fs.statSync(fullPath);

      if (stat.isDirectory()) {
        const srcDir = path.join(fullPath, "__vite__");
        if (fs.existsSync(srcDir) && fs.statSync(srcDir).isDirectory()) {
          const hasScss = fileExists(path.join(srcDir, "scss/index.scss"));
          const hasJs = fileExists(path.join(srcDir, "js/index.js"));

          if (hasScss || hasJs) {
            const relativePath = path
              .relative(COMPONENTS_PATH, fullPath)
              .replace(/\\/g, "/");

            // Заменяем точки и слэши на нижнее подчёркивание для безопасного имени
            const safeName = relativePath
              .replace(/\./g, "_")
              .replace(/\//g, "_");

            components.push({
              name: safeName,
              path: fullPath,
            });
          }
        } else {
          walk(fullPath); // углубляемся
        }
      }
    }
  }

  walk(baseDir);
  return components;
}

// Автоматическое определение компонентов
const detectedComponents = findComponentDirs(COMPONENTS_PATH);
const componentConfigs = Object.fromEntries(
  detectedComponents.map((comp) => [comp.name, comp.path]),
);

// Логирование найденных компонентов
if (detectedComponents.length === 0) {
  console.warn(
    "⚠️  Не найдено ни одного компонента с __vite__/scss/index.scss или __vite__/js/index.js",
  );
} else {
  console.log(`✅ Найдено компонентов: ${detectedComponents.length}`);
  detectedComponents.forEach((c) => console.log(`   - ${c.name} → ${c.path}`));
}

// Глобальные точки входа
const componentPaths = {
  template: `${TEMPLATE_PATH}/__vite__/scss/template.scss`,
  script: fileExists(`${TEMPLATE_PATH}/__vite__/js/index.js`)
    ? `${TEMPLATE_PATH}/__vite__/js/index.js`
    : null,
};

const validComponentEntries = [];

Object.entries(componentConfigs).forEach(([key, componentDir]) => {
  const scssPath = `${componentDir}/__vite__/scss/index.scss`;
  const jsPath = `${componentDir}/__vite__/js/index.js`;

  const hasScss = fileExists(scssPath);
  const hasJs = fileExists(jsPath);

  if (!hasScss && !hasJs) {
    console.warn(
      `⚠️  Компонент "${key}" не содержит ни scss/index.scss, ни js/index.js — пропускаем.`,
    );
    return;
  }

  validComponentEntries.push({
    key,
    paths: {
      ...(hasScss && { scss: scssPath }),
      ...(hasJs && { js: jsPath }),
    },
    basePath: componentDir,
  });
});

// Формируем входные точки для Rollup
const rollupInput = {};

// Глобальный SCSS
if (fileExists(componentPaths.template)) {
  rollupInput.template = componentPaths.template;
} else {
  console.warn(`⚠️  Файл template.scss не найден: ${componentPaths.template}`);
}

// Глобальный JS
if (componentPaths.script) {
  rollupInput.script = componentPaths.script;
}

// Компоненты
validComponentEntries.forEach(({ key, paths }) => {
  if (paths.scss) {
    rollupInput[`${key}_scss`] = paths.scss;
  }
  if (paths.js) {
    rollupInput[`${key}_js`] = paths.js;
  }
});

// Маппинг для выходных путей CSS
const cssPathMapping = Object.fromEntries(
  validComponentEntries.map(({ key, basePath }) => [key, basePath]),
);

// Определяем путь для CSS-файлов
const getCssOutputPath = (fileName) => {
  if (fileName?.includes("template")) {
    return `template_styles.css`;
  }

  for (const [key, basePath] of Object.entries(cssPathMapping)) {
    if (fileName?.includes(key)) {
      return `${basePath.replace(TEMPLATE_PATH + "/", "")}/style.css`;
    }
  }

  return `template_styles.css`;
};

// Основная конфигурация __vite__
export default defineConfig({
  base: BASE_PATH,
  // publicDir: `images`,
  // publicOutDir: `${TEMPLATE_PATH}/assets/public`,

  plugins: [
    vue(),
    svgSpritemap({
      pattern: `${TEMPLATE_PATH}/__vite__/sprite/**/*.svg`,
      filename: `assets/sprite.svg`,
      prefix: "",
      svgo: {
        multipass: true,
        plugins: [
          { name: "cleanupAttrs", params: { removeEmptyAttrs: true } },
          {
            name: "removeAttrs",
            params: {
              attrs: ["fill", "fill-rule", "stroke", "stroke-width"],
            },
          },
        ],
      },
    }),
  ],

  css: {
    preprocessorOptions: {
      scss: {
        api: "modern-compiler",
      },
    },
  },

  build: {
    preserveModules: true,
    sourcemap: false,

    rollupOptions: {
      input: rollupInput,

      output: {
        // Обработка JS-файлов
        entryFileNames: (chunkInfo) => {
          const name = chunkInfo.name;

          if (name === "script") {
            return `template_scripts.js`;
          }

          if (name.endsWith("_js")) {
            const componentName = name.slice(0, -3);
            const basePath = cssPathMapping[componentName];
            if (basePath) {
              return `${basePath.replace(
                TEMPLATE_PATH + "/",
                "",
              )}/custom_script.js`;
            }
          }

          return `[name].js`;
        },

        // Обработка статики
        assetFileNames: (assetInfo) => {
          const fileName = assetInfo.names?.[0];

          // CSS
          if (fileName?.match(/\.(css)$/i)) {
            return getCssOutputPath(fileName);
          }

          // Шрифты
          if (fileName?.match(/\.(woff|woff2)$/i)) {
            return `assets/fonts/[name].[ext]`;
          }

          // Изображения
          if (fileName?.match(/\.(png|jpg|jpeg|gif|svg|webp)$/i)) {
            console.log(assetInfo);
            const originalPath = assetInfo.originalFileNames?.[0] || "";
            if (originalPath.includes("components/bitrix")) {
              const match = originalPath.indexOf("components/bitrix");
              const componentPath = originalPath
                .slice(match)
                .replace("/__vite__/img/", "/img/");
              return componentPath;
            }

            return `assets/images/[name].[ext]`;
          }

          return `[name].[ext]`;
        },
      },
    },

    outDir: DIST_PATH,
    emptyOutDir: false,
  },

  resolve: {
    alias: {
      "@scss": path.resolve(__dirname, `${TEMPLATE_PATH}/__vite__/scss`),
      "@fonts": path.resolve(__dirname, `${TEMPLATE_PATH}/__vite__/fonts`),
      "@img": path.resolve(__dirname, `${TEMPLATE_PATH}/__vite__/images`),
    },
  },
});
