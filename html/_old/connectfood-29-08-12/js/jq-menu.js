window.where = window.where || {};
window.where.tracking = {
  track_click_to_call: function(evt) {
    where.tracking.track_secondary_action(evt, 'click_to_call');
  },

  track_click_to_map: function(evt) { 
    where.tracking.track_secondary_action(evt, 'click_to_map');
  },

  track_click_to_deal: function(evt) {
    where.tracking.track_secondary_action(evt, 'click_to_deal');
  },

  track_secondary_action: function(evt, track) {
    evt.preventDefault();
    if((this.tracking_refid != undefined) && (this.tracking_refid != "")) { 
      $.ajax({
        url:"/merchants/track_click",
        crossDomain: true,
        type:'POST', 
        data:{track: track, refid: this.tracking_refid},
        complete:function(){   
          document.location = $(evt.target).attr('href');
        }
      });
    }
  }
};

$(function() {
  $('a[data-menu]').each(function(i, elt) {
    var lnk = '#' + elt.id
    var mnu = '#' + $(lnk).attr('data-menu');
    $(mnu).hide();
    $(mnu).removeClass('new-menu');
    $('body').click(function(evt) {
      var result = true;
      var tgt = $(evt.target);
      var showIt;
      if (tgt.is(lnk)) {
        var vis = $(mnu + ':visible');
        showIt = (vis.length == 0);
        result = false;
      } else if (!tgt.is(mnu) && (tgt.parents().index(mnu) == -1)) {
        showIt = false;
      }
      if (showIt) {
        $(lnk).addClass('active');
        $(mnu).css({top:0,left:0});
        $(mnu).position({my: 'top', at: 'bottom', of: $(lnk), collision: 'fit none'});
        $(mnu + ':hidden').css('z-index', 100).slideDown('fast');
        return false;
      } else {
        $(lnk).removeClass('active');
        $(mnu + ':visible').css('z-index', 99).slideUp('fast');
      }
      return result;
    });
  });
});

$(function() {
  var mnu = '#locmenu';
  var fld = '#locinput';
  var box = '#loc-input';
  if ($(mnu).length == 0) return;
  $(mnu).hide();
  $(mnu).removeClass('new-menu');
  $('body').click(function(evt) {
    var tgt = $(evt.target);
    // if (tgt.is(box)) {
    //   $(fld).focus();
    // }
    if (tgt.is(box) || tgt.is(fld) || tgt.is(mnu) || (tgt.parents().index(mnu) != -1)) {
      $(mnu).css({top:0,left:0});
      $(mnu).position({my: 'top', at: 'bottom', of: $(box), collision: 'fit none'});
      $(mnu + ':hidden').css('z-index', 100).slideDown('fast');
      return false;
    } else {
      $(mnu + ':visible').css('z-index', 99).slideUp('fast');
    }
  });
});
