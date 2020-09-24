const user = {
  name: "Tony Stark",
  avatar: 'https://pickaface.net/gallery/avatar/23556424_171128_2020_uqewt.png',
  email: "iron-man@mcu.com",
  password: "123456",
};

let isOpenLoginForm = false;

const userLoginPopUp = document.getElementById("formPopup");
function openLoginForm() {
  const userLoginPopUp = document.getElementById("formPopup");
  userLoginPopUp.classList.toggle("visible");
}

document.addEventListener("DOMContentLoaded", () => {
  const body = document.querySelector("body");
  body.append()
  body.style.opacity = 1
  const formPopUp = document.querySelector(".formPopup");
  const formLogin = document.querySelector("form.formPopupContainer");
  const userProfileIcon = document.querySelector(".user-profile-icon > img");
  function handleForm(event) {
    event.preventDefault();
    const formData = new FormData(
      document.querySelector("form.formPopupContainer")
    );
    const datas = [...[...formData].map((c) => c[1])];
    const [email, password] = datas;

    const validations = [user.email === email, user.password === password];
    const isLoginValid = +validations.every((validation) => validation);
    const loginMessages = [
      () => {
        const toastElement = document.querySelector(".toast.toast--red");
        toastElement.classList.add("show");
        setTimeout(() => {
          toastElement.classList.remove("show");
        }, 3000);
      },
      () => {
        const toastElement = document.querySelector(".toast.toast--green");
        toastElement.classList.add("show");
        setTimeout(() => {
          toastElement.classList.remove("show");
        }, 3000);
        formPopUp.classList.toggle("visible");
        userProfileIcon.src = "../../assets/icons/logged-in.svg";
      },
    ];
    const message = loginMessages[isLoginValid];
    message();
  }
  formLogin.addEventListener("submit", handleForm);
});
