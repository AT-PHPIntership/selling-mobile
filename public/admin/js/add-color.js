$("#add_color").on("click", function(){
  var element1 = document.getElementsByClassName('group-none');
  var element = $('.group-add-color').last().clone(true);
  element1[0].classList.remove('group-none');
  element.find("input, select").each(function(key, item) {
    let num = parseInt(item.name.match(/\d+/)[0]);
    item.name = item.name.replace(num, num + 1);
  });
  $('.group-add-color').last().after(element);
});
