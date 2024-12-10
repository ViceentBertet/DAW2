obj = [1, 2, 3, 4];
obj.foo = "hello";
for (let i in obj){
    console.log(i);
}
for (let i of obj){
    console.log(i);
}