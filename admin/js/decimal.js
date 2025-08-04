/*document.addEventListener('DOMContentLoaded', function() {
    const inputElement = document.getElementById('mcuadrados');
    const errorMessage = document.getElementById('errorMessage');

    console.log(errorMessage)

    inputElement.addEventListener('input', function() {
        let value = this.value;

        // Regular expression to match numbers with exactly two decimal places (comma-separated),
        // or integers. It also allows for an optional leading minus sign.
        // It's designed to be flexible during typing (e.g., allows "123," or "123,4")
        const regex = /^-?\d+(,\d{0,2})?$/; // Allows 0, 1, or 2 digits after comma

        if (regex.test(value) || value === '' || value === '-' || value.endsWith(',')) {
            // If it matches the regex, is empty, is just a minus sign, or ends with a comma
            errorMessage.textContent = ''; // Clear any previous error message
        } else {
            errorMessage.textContent = 'Por favor, ingrese un número con dos decimales (ej. 123,45 o 123).';
        }
    });

    // Optional: Add a 'blur' event listener to finalize validation and format when the user leaves the field
    inputElement.addEventListener('blur', function() {
        let value = this.value.trim(); // Trim whitespace

        // Regex for final validation: strictly two decimals after a comma, or a whole number
        const finalRegex = /^-?\d+,\d{2}$/;
        const integerRegex = /^-?\d+$/;

        if (value === '') {
            errorMessage.textContent = '';
            return; // No validation needed for empty field on blur
        }

        if (finalRegex.test(value)) {
            // Already in the correct format with two decimals
            errorMessage.textContent = '';
        } else if (integerRegex.test(value)) {
            // If it's a whole number, format it to X,00
            this.value = value + ',00';
            errorMessage.textContent = '';
        } else {
            // If it doesn't match either the two-decimal or whole number format
            errorMessage.textContent = 'Por favor, ingrese un número con exactamente dos decimales (ej. 123,45) o un número entero (ej. 123).';
            // Optionally, clear the input or reset it to a valid state
            // this.value = '';
        }
    });
});*/
/*
document.addEventListener("DOMContentLoaded", function () {
  const inputElement = document.querySelectorAll(".input-cl");
  const errorMessage = document.querySelectorAll(".input-error");

  

  let contador = 0;

  inputElement.forEach((input) => {

    console.log(contador);

    input.addEventListener("input", function () {
      let value = this.value;

      // Regular expression to match numbers with exactly two decimal places (comma-separated),
      // or integers. It also allows for an optional leading minus sign.
      // It's designed to be flexible during typing (e.g., allows "123," or "123,4")
      const regex = /^-?\d+(,\d{0,2})?$/; // Allows 0, 1, or 2 digits after comma

      if (
        regex.test(value) ||
        value === "" ||
        value === "-" ||
        value.endsWith(",")
      ) {
        // If it matches the regex, is empty, is just a minus sign, or ends with a comma
        errorMessage[0].forEach((msg) => (msg.textContent = "")); // Clear any previous error message
      } else {
        errorMessage.forEach(
          (msg) =>
            (msg.textContent =
              "Por favor, ingrese un número con dos decimales (ej. 123,45 o 123).")
        );
      }
    });

    // Optional: Add a 'blur' event listener to finalize validation and format when the user leaves the field
    input.addEventListener("blur", function () {
      let value = this.value.trim(); // Trim whitespace

      // Regex for final validation: strictly two decimals after a comma, or a whole number
      const finalRegex = /^-?\d+,\d{2}$/;
      const integerRegex = /^-?\d+$/;

      if (value === "") {
        errorMessage.textContent = "";
        return; // No validation needed for empty field on blur
      }

      if (finalRegex.test(value)) {
        // Already in the correct format with two decimals
        errorMessage.textContent = "";
      } else if (integerRegex.test(value)) {
        // If it's a whole number, format it to X,00
        this.value = value + ",00";
        errorMessage.textContent = "";
      } else {
        // If it doesn't match either the two-decimal or whole number format
        errorMessage.textContent =
          "Por favor, ingrese un número con exactamente dos decimales (ej. 123,45) o un número entero (ej. 123).";
        // Optionally, clear the input or reset it to a valid state
        // this.value = '';
      }
    });

    contador += 1;

  });
  
});
*/
document.addEventListener('DOMContentLoaded', function() {

    /**
     * Configura la validación de un campo de entrada para números con dos decimales (separador de coma).
     * @param {string} inputId El ID del elemento input.
     * @param {string} errorMsgId El ID del elemento p donde se mostrará el mensaje de error.
     */
    function setupDecimalInputValidation(inputId, errorMsgId) {
        const inputElement = document.getElementById(inputId);
        const errorMessage = document.getElementById(errorMsgId);

        // --- Evento 'input' (validación en tiempo real mientras se escribe) ---
        inputElement.addEventListener('input', function() {
            let value = this.value;

            // Permite números enteros, o números con una coma y 0, 1 o 2 dígitos después de ella.
            // Maneja el signo negativo opcional al principio.
            const regexDuringTyping = /^-?\d*(,\d{0,2})?$/;

            // También permitimos que el campo esté vacío o sea solo un signo menos al inicio.
            if (regexDuringTyping.test(value) || value === '' || value === '-') {
                errorMessage.textContent = ''; // Limpia el mensaje de error si es válido
            } else {
                errorMessage.textContent = 'Formato inválido. Use coma (,) para decimales y máximo dos decimales (ej: 123,45).';
            }
        });

        // --- Evento 'blur' (validación final y formateo al perder el foco) ---
        inputElement.addEventListener('blur', function() {
            let value = this.value.trim(); // Elimina espacios en blanco al inicio y al final

            // Regex para la validación final: estrictamente dos decimales después de una coma, o un número entero.
            const finalRegexTwoDecimals = /^-?\d+,\d{2}$/;
            const finalRegexInteger = /^-?\d+$/;

            if (value === '') {
                errorMessage.textContent = ''; // Si está vacío, no hay error.
                return;
            }

            if (finalRegexTwoDecimals.test(value)) {
                // Si ya está en el formato correcto (ej: 123,45)
                errorMessage.textContent = '';
            } else if (finalRegexInteger.test(value)) {
                // Si es un número entero (ej: 123), lo formatea a X,00
                this.value = value + ',00';
                errorMessage.textContent = '';
            } else {
                // Si no coincide con ninguno de los formatos válidos al finalizar
                errorMessage.textContent = '¡Error! Ingrese un número con dos decimales (ej: 123,45) o un número entero (ej: 123).';
                // Opcional: limpiar el input si el formato final es totalmente incorrecto
                // this.value = '';
            }
        });
    }

    // --- Llama a la función para cada uno de tus inputs ---
    setupDecimalInputValidation('mcuadrados', 'errorMessage1');
    setupDecimalInputValidation('valormcuadrados', 'errorMessage2');
    setupDecimalInputValidation('valorpropiedad', 'errorMessage3');
});
