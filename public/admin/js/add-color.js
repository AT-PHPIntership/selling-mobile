$("#add_color").on("click", function(){
  var element = $('.group-add-color').last().clone(true);
  element.find("input, select").each(function(key, item) {
    let num = parseInt(item.name.match(/\d+/)[0]);
    item.name = item.name.replace(num, num + 1);
  });
  $('.group-add-color').last().after(element);
 });
 