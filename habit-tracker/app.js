const express = require("express");
const bodyParser = require("body-parser");
const app = express();

let habits = [];

app.set("view engine", "ejs");
app.use(express.static("public"));
app.use(bodyParser.urlencoded({ extended: true }));

app.get("/", (req, res) => {
  res.render("index", { habits: habits });
});

app.post("/add", (req, res) => {
  const habit = req.body.habit;
  if (habit) {
    habits.push({ name: habit, done: false });
  }
  res.redirect("/");
});

app.post("/check", (req, res) => {
  const index = req.body.index;
  habits[index].done = !habits[index].done;
  res.redirect("/");
});

app.listen(3000, () => {
  console.log("Habit Tracker running on http://localhost:3000");
});
