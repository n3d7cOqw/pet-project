
const elem = document.querySelector(".editInfo");
elem.addEventListener("click", runEditBio);
function runEditBio() {
    const save = document.querySelector(".editInfo")
    const div = document.createElement("div");
    const name = document.querySelector(".nameContainer");
    const country = document.querySelector(".countryContainer");
    const bio = document.querySelector(".bioContainer");
    const inputName = document.createElement("input");
    const inputCountry = document.createElement("input");
    const textArea = document.createElement("textarea");
    const photo = document.querySelector(".photoProfile");
    const inputPhoto = document.createElement("input")
    textArea.classList.add("bio");
    elems = [inputName, inputCountry, textArea];
    inputName.setAttribute("name", "name");
    inputCountry.setAttribute("name", "country");
    textArea.setAttribute("name", "bio");
    inputPhoto.setAttribute("type", "file");
    inputPhoto.setAttribute("name", "photo");
    // const submitBTN = document.createElement("button");
    if (elem.innerHTML.trim() == "<p>Редактировать</p>") {
        const buttons = document.createElement("div")
        buttons.classList.add("formButtons")
        inputName.classList.add("inputName");
        inputCountry.classList.add("inputName");
        name.append(inputName);
        country.append(inputCountry);
        bio.append(div);
        div.append(textArea);
        save.replaceWith(buttons);
        photo.append(inputPhoto);
        buttons.innerHTML = '<input class="submitEditForm" type="submit" name="submit" value="Подтвердить"><input class="cancelEditForm" type="button" name="cancel" value="Отменить">'
    } else {
        elems.forEach(element => {
            elems.remove();
        });
    }
}

const button = document.querySelector(".anotherSetting button")
button.addEventListener("click", openSettings);
console.log(button)
function openSettings() {
    const modalWindow = document.createElement("div");
    const modal = document.querySelector(".modal");
    modalWindow.innerHTML = '<div class="modal"><div class="modalWindow"><div><a href="change-login">Смена логина</a><a href="change-password">Смена пароля</a><button class="btnClose">X</button></div><div class="overlay"></div></div>'
    button.append(modalWindow);
    const btnClose = document.querySelector(".btnClose");
    // console.log(event.target);
    window.addEventListener("click", function (event) {
        if (event.target == btnClose) {
            console.log(event.target);
            modalWindow.classList.add("hidden");
            // button.addEventListener("click", openSettings);
        }
    });
}