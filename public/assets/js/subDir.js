// Sets background color of buttons in sub-directories to randomly ordered, predefined values
const colors = [
  "#e9afa3",
  "#20495c",
  "#8c4843",
  "#60514c",
  "#69a2ce",
  "#87bba2",
  "#786a82",
  "#6b3434",
  "#586a6a",
  "#7a5256",
  "#373b3f",
  "#3a4c37",
  "#4686ba"
].sort((_a, _b) => Math.random() >= Math.random())

const subDirItems = [...document.getElementsByClassName("dirButton")]

subDirItems.map((v, i) => {
  v.style.backgroundColor = colors[i]
})
