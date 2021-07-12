const fields = document.querySelectorAll("[required]")

function ValidateField(field) {
    // logica para verificar se existem erros
    function verifyErrors() {
        let foundError = false;

        for (let error in field.validity) {
            // se não for customError
            // então verifica se tem erro
            if (field.validity[error] && !field.validity.valid) {
                foundError = error
            }
        }
        return foundError;
    }

    function customMessage(typeError) {
        const messages = {
            text: {
                valueMissing: "Por favor, preencha este campo"
            },
            email: {
                valueMissing: "Email é obrigatório",
                typeMismatch: "Por favor, preencha um email válido"
            }
        }

        return messages[field.type][typeError]
    }

    function setCustomMessage(message) {
        const spanError = field.parentNode.querySelector("span.main__form--error")
        //icon
        const iconError = field.parentNode.querySelector("i .main__form--notcheck")
        const iconCheck = field.parentNode.querySelector("i .main__form--check")

        if (message) {
            spanError.classList.add("active")
            iconError.style.visibility = "visible"
            iconCheck.style.visibility = "hidden"
            spanError.innerHTML = message
        } else {
            spanError.classList.remove("active")
            iconError.style.visibility = "hidden"
            iconCheck.style.visibility = "visible"
            spanError.innerHTML = ""
        }
    }

    return function () {

        const error = verifyErrors()

        if (error) {
            const message = customMessage(error)

            field.style.borderColor = "#E43D40"
            setCustomMessage(message)
        } else {
            field.style.borderColor = "#75b9a5"
            setCustomMessage()
        }
    }
}


function customValidation(event) {

    const field = event.target
    const validation = ValidateField(field)

    validation()

}

for (field of fields) {
    field.addEventListener("invalid", event => {
        // eliminar o bubble
        event.preventDefault()

        customValidation(event)
    })
    field.addEventListener("blur", customValidation)
}

const buttonD = document.querySelector(".send-btn")
document.querySelector("form")
    .addEventListener("submit", event => {
        console.log("enviar o formulário")

        // não vai enviar o formulário
        event.preventDefault()
    })