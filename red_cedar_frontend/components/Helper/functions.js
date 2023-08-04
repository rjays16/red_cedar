export function disableButton(class_selector, flag) {
  jQuery(document).find(class_selector).prop('disabled', flag);
}
