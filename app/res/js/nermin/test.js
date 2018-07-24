function setModal(id) {
    if(canvasSets.length !== 0){
        let node = findNode(id);
        console.log('FOUND: ', node);
        if(node)
            setNode(node);
    }
    else{
        // alert('No elements on the canvas!!');
        $.notify("Something went wrong",
        { position: 'top center',
        className: 'error',
        gap: 5 }
        );
    }


}

function findNode(node_id) {
    console.log('node_id: ', node_id);
    if(!node_id){
        for(let i = 0; i < shapes.length; i++){
            console.log(shapes[i].data("root"));
            if(shapes[i].data("root") === true){
                return shapes[i];
            }
        }
        console.log('Couldn\'t find first node.');
    }
    else{
        for(let i = 0; i < shapes.length; i++){
            if(shapes[i].id === node_id){
                return shapes[i];
            }
        }
        console.log('Couldn\'t find correct node.');
    }

}

function setNode(node) {
    let testdiv = document.getElementById('testdiv');
    let headder = document.getElementById('h3id');
    let question = document.getElementById('question');

    while (testdiv.firstChild) {
        testdiv.removeChild(testdiv.firstChild);
    }

    let conns = getConns(node);

    if(conns.length === 0){
        let p = document.createElement("P");

        console.log('THE END');
    }


    let set_index = getSet(node.id);

    let set = canvasSets[set_index];

    if(set.length === 3){
        headder.innerHTML = set[2].attr("text");
        question.innerHTML = set[0].data("desc");
    }
    else{
        headder.innerHTML = set[1].attr("text");
    }


    for(let i = 0; i < conns.length; i++){
        let btn = document.createElement("BUTTON");
        btn.id = conns[i].to.id;
        if(paper.getById(btn.id).data('root') === true){
            console.log('ZANKA!');
            continue;
        }
        btn.classList.add('btn');
        btn.classList.add('btn-block');
        btn.classList.add('btn-primary');
        btn.innerHTML = conns[i].text.attr("text");
        btn.addEventListener('click', restart);
        testdiv.appendChild(btn);
    }
    // alert(set[0].data("subtree_height"));
    try {
        const progress = document.getElementById("myBar");
        // const width =  (100 / set[0].data("subtree_height"));
        const width = (100 / tree_vertices[node.id].height);
        console.log("HEHEHEHEHEHEHE:", node.id + ", " + width, tree_vertices[node.id].height);
        progress.style.width = width + "%"; 
        // progress.innerHTML = Math.round(width) + "%";
    } catch(err){
        console.log(err);
    }

    $("#testmodal").modal();
}

function getConns(node) {

    let found = [];

    for(let i = 0; i < connections.length; i++){
        if(connections[i].from.id === node.id){
            found.push(connections[i]);
        }
    }
    return found;
}

function restart() {
    console.log('RESTART');
    setModal(this.id);
}