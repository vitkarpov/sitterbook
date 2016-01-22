$(function () {

  var R = Raphael("map4", 700, 850);
  var attr = {
      fill: "#e6e7e8",
      stroke: "#B5B5B5",
      "stroke-width": 1,
      "stroke-linejoin": "round"
  };

  for (region in moscow.regions) {

    if ( moscow.regions.hasOwnProperty(region) ) {

      var path = R.path(moscow.regions[region]).attr(attr);

      (function (path, region){
        path.node.toggle      = function () {
          path.node.active = !path.node.active;
          if (path.node.active) path.animate({fill: "#B5B5B5"}, 100);
          else path[0].onmouseout();
          // console.log(region, $('input:checkbox#msk'+region))
          $('input:checkbox#msk_'+region).attr('checked', path.node.active);
        }
        path.node.onmouseover = function () { if (!path.node.active) path.animate({fill: "#2495dd", stroke: '#ffffff'}, 300); };
        path.node.onmouseout  = function () { if (!path.node.active) path.animate({fill: "#e6e7e8", stroke: "#B5B5B5"}, 300); };
        path.node.onclick     = path.node.toggle;

        $('input:checkbox#msk_'+region).change(function () {
          var e = path.node;
          // console.log(this.id, e)
          if (e) $(e).trigger('click');
        });
      })(path, region);

    }

  };

});
