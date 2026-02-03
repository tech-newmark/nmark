const focusableElements = [
  "a[href]",
  "input:not(input[type='hidden'])",
  "select",
  "textarea",
  "button",
  "iframe",
  "[contenteditable]",
  '[tabindex]:not([tabindex^="-"])',
];

export const focusTrap = (node) => {
  console.log(node);
  const focusableContent = node.querySelectorAll(focusableElements);
  const firstFocusableElement = focusableContent[0];
  console.log("1", firstFocusableElement);
  const lastFocusableElement = focusableContent[focusableContent.length - 1];
  firstFocusableElement.focus();

  if (focusableContent.length) {
    console.log("2");
    const onBtnClickHandler = (evt) => {
      const isTabPressed = evt.key === "Tab" || evt.key === 9;

      if (evt.key === "Escape") {
        document.removeEventListener("keydown", onBtnClickHandler);
      }

      if (!isTabPressed) {
        return;
      }

      if (evt.shiftKey) {
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus();
          evt.preventDefault();
        }
      } else {
        if (document.activeElement === lastFocusableElement) {
          firstFocusableElement.focus();
          evt.preventDefault();
        }
      }
    };

    document.addEventListener("keydown", onBtnClickHandler);
  }
};
