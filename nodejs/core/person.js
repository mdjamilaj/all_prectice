// const person = {
//     name: "Muhammad JAmil",
//     age: 29
// }

console.log(__dirname, __filename);
class Person {
    constructor(name, age) {
        this.name = name,
        this.age = age
    }

    greeting() {
        console.log(`My name is ${this.name}. I am ${this.age} Year Old.`);
    }
}

module.exports = Person;