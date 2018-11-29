// objects.js for all js

// Item object
function Item(){
    this.addToDocument = function(){
       document.body.appendChild(this.item);
    }
};

// Label object
function Label(){
    this.createLabel = function(text, id){
        this.item = document.createElement("p");
        this.item.setAttribute("id", id);
        var textLabel = document.createTextNode(text);
        this.item.appendChild(textLabel);
    },
    this.addLink = function(link){
        newlink = document.createElement('a');
        newlink.setAttribute('href', link);
        this.item.appendChild(newlink);
    }
    this.setText = function(text){
        this.item.innerHTML = text;
    }
};

// Button object
function Button(){
    this.createButton = function(text, id){
        this.item = document.createElement("button");
        this.item.setAttribute("id", id);
        var textLabel = document.createTextNode(text);
        this.item.appendChild(textLabel);
    },
    this.addClickEventHandler = function(handler, args){
        this.item.onmouseup = function(){ handler(args); }
    }
};

// Dropdown object
function Dropdown(){
    this.createDropdown = function(dict, id, selected){
        this.item = document.createElement("select");
        this.item.setAttribute("id", id);
        for(var value in dict){
            var op = document.createElement("option");
            op.text = dict[value];
            op.value = value;
            this.item.appendChild(op);
        }
        this.item.selectedIndex = selected;
    },
    this.getSelected = function(){
        var index = this.item.selectedIndex
        return this.item.options[index].value;
    }
}

// Div object
function Div(){
    this.createDiv = function(id, _class){
        this.item = document.createElement("div");
        this.item.setAttribute("class", _class);
    }
    this.style = function(args){
        for (let style in args) {
            this.item.style[style] = args[style];
        }
    }
    this.appendChild = function(anything){
        this.item.appendChild(anything.item);
    }
}
