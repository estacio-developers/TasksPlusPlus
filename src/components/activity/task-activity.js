class TaskActivity extends HTMLElement {
  async connectedCallback() {
    const self = this;

    const subject = self.getAttribute("subject");
    const content = self.getAttribute("content");
    const description = self.getAttribute("description");
    const hour = self.getAttribute("hour");
    const time = self.getAttribute("time");

    const responseHTML = await fetch("/src/components/activity/activity.html");
    const responseCSS = await fetch("/src/components/activity/activity.css");

    const textHTML = await responseHTML.text();
    const textCSS = await responseCSS.text();

    const style = document.createElement("style");
    style.textContent = textCSS;

    self.innerHTML = `
    <style>${style.innerHTML}</style>
    ${textHTML}`;

    // window.addEventListener("load", () => {
    //   self.querySelector(".js-subject").textContent = subject;
    //   self.querySelector(".js-content").textContent = content;
    //   self.querySelector(".js-description").textContent = description;
    //   self.querySelector(".js-hour").textContent = hour;
    //   self.querySelector(".js-time").textContent = time;
    // });
    setAllAttributes(self);
  }
}
customElements.define("task-activity", TaskActivity);

function setAllAttributes($element) {
  const subject = $element.getAttribute("subject");
  const content = $element.getAttribute("content");
  const description = $element.getAttribute("description");
  const hour = $element.getAttribute("hour");
  const time = $element.getAttribute("time");

  $element.querySelector(".js-subject").textContent = subject;
  $element.querySelector(".js-content").textContent = content;
  $element.querySelector(".js-description").textContent = description;
  $element.querySelector(".js-hour").textContent = hour;
  $element.querySelector(".js-time").textContent = time;
}
