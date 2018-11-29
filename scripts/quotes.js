// quotes.js for Quotes.html

// Object initialization
Label.prototype = new Item();
Div.prototype = new Item();

main_div = new Div();
main_div.createDiv("container", "container");

var length = 5;                 // Length of the quotes, get from db

for (var i = 0; i <= length; i++){
    tmp_label = "quote" + i;
    tmp_label = new Label();
    tmp_label.createLabel("Quote goes here"+i, "Quote"+i+"_label");
    tmp_label.addLink("linkgoeshere");
    main_div.appendChild(tmp_label)
}

main_div.addToDocument();
