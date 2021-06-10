const toggleClass = function (element, oldClass, newClass) {
  element.classList.remove(oldClass);
  element.classList.add(newClass);
};

const enableForm = function (form) {
  Array.from(form.elements).forEach(input => {
    input.disabled = false;
    if (input.type === 'submit')
      toggleClass(input, 'submit-btn--disabled', 'submit-btn--enabled');
  });
};

document.querySelectorAll('.edit-btn').forEach(editButton => {
  editButton.addEventListener('click', event =>
    enableForm(event.target.parentElement)
  );
});

class FormValidator {
  constructor(form) {
    this.form = form;
    this.inputValues = Array.from(this.form.getElementsByTagName('input')).map(
      input => {
        return input.value;
      }
    );
    this.didFormChange = this.didFormChange.bind(this);
  }

  didFormChange() {
    const change = Array.from(this.form.getElementsByTagName('input')).some(
      (input, index) => {
        return input.value !== this.inputValues[index];
      }
    );
    return change;
  }
}

const formValidator = new FormValidator(
  document.getElementById('no-password-form')
);

document
  .querySelector('#no-password-form')
  .addEventListener('submit', event => {
    formValidator.didFormChange() ? null : displayNoFormChangeMessage();

    function displayNoFormChangeMessage() {
      event.preventDefault();
      alert("No change to save")
    }
  });
