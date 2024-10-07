const searchIcon = document.getElementById("search-icon");
const searchOverlay = document.getElementById("search-overlay");
const closeSearch = document.getElementById("close-search");
const add=document.querySelector(".add")
const close=document.querySelector(".clos")
const user=document.querySelector(".user")
let display = document.getElementById("display");
let buttons = document.querySelectorAll('button[type="button"]');

let calculator = {
  displayValue: "",
  firstOperand: null,
  operator: null,

  handleButtonPress: function (buttonValue) {
    switch (buttonValue) {
      case "=":
        this.calculate();
        break;
      case "C":
        this.clear();
        break;
      case "Del":
        this.delete();
        break;
      default:
        this.displayValue += buttonValue;
        display.value = this.displayValue;
    }
  },

  calculate: function () {
    let result = eval(this.displayValue);
    display.value = result;
    this.displayValue = result;
  },

  clear: function () {
    this.displayValue = "";
    display.value = "";
  },

  delete: function () {
    this.displayValue = this.displayValue.slice(0, -1);
    display.value = this.displayValue;
  },
};

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    calculator.handleButtonPress(button.value);
  });
});
add.addEventListener("click",()=>{
user.classList.add("openIn")

})
close.addEventListener("click",()=>{
user.classList.remove("openIn")
})
searchIcon.addEventListener("click", () => {
  searchOverlay.classList.add("show");
});

closeSearch.addEventListener("click", () => {
  searchOverlay.classList.remove("show");
});
const tabLinks = document.querySelectorAll('.tab-link');
const tabContent = document.querySelectorAll('.tab');

tabLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    const targetTab = document.getElementById(link.dataset.tab);

    tabContent.forEach((tab) => {
      tab.classList.remove('active');
    });

    targetTab.classList.add('active');

    tabLinks.forEach((link) => {
      link.classList.remove('active');
    });

    link.classList.add('active');
  });
});