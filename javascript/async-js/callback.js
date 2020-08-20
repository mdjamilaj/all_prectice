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

function createPost(post, callback) {
    setTimeout(() => {
        posts.push(post);
        callback();
        console.log(callback);
    }, 2000)
}

getPosts();
createPost({name: "TEst", body: "TEst Body"}, getPosts);
