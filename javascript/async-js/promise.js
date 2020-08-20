const posts  = [
    {name: "Jamil", body: "Muhammad jamil"},
    {name: "Zakir", body: "Muhammad zakir"},
];

function getPosts() {
    setTimeout(()=> {
        let output ='';
        posts.forEach((post, index) => {
            output +=`<li>${post.name}</li>`;
        });
        document.body.innerHTML = output;
    }, 1000)
}

function createPost(post) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            posts.push(post);

            const error = true;
            if(!error){
                resolve();
            }else{
                reject("Error: Something wrong")
            }
        }, 2000)
    });
}

// createPost({name: "JAmil", body: "this is post three"})
// .then(getPosts)
// .catch(err => console.log(err))

//******* Async/ Await ***** */

// async function init() {
//     await createPost({name: "JAmil", body: "this is post three"});
//     getPosts();
// }

// init();

//*******Async/ Await and fetch ***** */

async function fetchUsers() {
    const res = await fetch('https://jsonplaceholder.typicode.com/posts');

    const data = await res.json();

    console.log(data);
}

fetchUsers();


//******* Promise all ***** */
// const promise1 = Promise.resolve("HEllo World");
// const promise2 = 10;
// const promise3 = new Promise((resolve, reject) => {
//     setTimeout(resolve, 2000, "Goodbye");
// })

// const promise4 = fetch('https://jsonplaceholder.typicode.com/posts').then(res => 
//     res.json()
// );

// Promise.all([promise1, promise2, promise3, promise4]).then(values => console.log(values))