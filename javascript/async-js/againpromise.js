// function setup() {
//     noCanvas()
//     delay(1000)
//     .then(() => console.log('hello'))
//     .catch(err => console.error(err));

//     delay('promising')
//     .then(() => console.log('hello'))
//     .catch(err => console.error(err))
// }


// function delay(time) {
//     return new Promise((resolve, reject) => {
//         if(isNaN(time)){
//             reject(new Error('delay requires a valid number'));
//         }
//         setTimeout(resolve, time);
//     })
// }

function setup() {
    // noCanvas();
    delay(1000);
}

function delay(time) {
    setTimeout(sayHello, time)
}

function sayHello() {
    createP("hello");
}

setup()