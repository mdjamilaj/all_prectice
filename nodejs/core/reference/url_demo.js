const url = require('url');

const myUrl = new URL('http://mywebsite.com/hello.html?id=100&status=active');

//Serialzied URL
console.log(myUrl.href);
console.log(myUrl.toString());

//Host (root domain)
console.log(myUrl.host);

//Hostname (does not get port)
console.log(myUrl.hostname);

//PAthname
console.log(myUrl.pathname);

//Search
console.log(myUrl.search);

//params object
console.log(myUrl.searchParams);

//Add param
myUrl.searchParams.append('abc', '123');
console.log(myUrl.searchParams);

//Loop through params
myUrl.searchParams.forEach((value, name) => console.log(`${name}: ${value}`))
