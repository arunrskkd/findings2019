
    document.addEventListener("DOMContentLoaded", function() {
  var lastElementClicked;
  var PrevLink = document.querySelector('a.prev');
  var NextLink = document.querySelector('a.next');

  Barba.Pjax.init();
  Barba.Prefetch.init();

  Barba.Dispatcher.on('linkClicked', function(el) {
    lastElementClicked = el;
  });

  var MovePage = Barba.BaseTransition.extend({
    start: function() {
      this.originalThumb = lastElementClicked;

      Promise
        .all([this.newContainerLoading, this.scrollTop()])
        .then(this.movePages.bind(this));
    },

    scrollTop: function() {
      var deferred = Barba.Utils.deferred();
      var obj = { y: window.pageYOffset };

      TweenLite.to(obj, 0.4, {
        y: 0,
        onUpdate: function() {
          if (obj.y === 0) {
            deferred.resolve();
          }

          window.scroll(0, obj.y);
        },
        onComplete: function() {
          deferred.resolve();
        }
      });

      return deferred.promise;
    },

    movePages: function() {
      var _this = this;
      var goingForward = true;
    //   this.updateLinks();

      if (this.getNewPageFile() === this.oldContainer.dataset.prev) {
        goingForward = false;
      }

      TweenLite.set(this.newContainer, {
        visibility: 'visible',
        xPercent: goingForward ? 100 : -100,
        position: 'fixed',
        left: 0,
        top: 0,
        right: 0
      });

      TweenLite.to(this.oldContainer, 0.6, { xPercent: goingForward ? -100 : 100 });
      TweenLite.to(this.newContainer, 0.6, { xPercent: 0, onComplete: function() {
        TweenLite.set(_this.newContainer, { clearProps: 'all' });
        _this.done();
      }});
      var split = new Split();
    },

    // updateLinks: function() {
    //   PrevLink.href = this.newContainer.dataset.prev;
    //   NextLink.href = this.newContainer.dataset.next;
    // },

    getNewPageFile: function() {
      return Barba.HistoryManager.currentStatus().url.split('/').pop();
    }
  });

  Barba.Pjax.getTransition = function() {
    return MovePage;
  };



  // ignore rules
Barba.Pjax.originalPreventCheck = Barba.Pjax.preventCheck;
Barba.Pjax.preventCheck = function(evt, element) {
	if (!Barba.Pjax.originalPreventCheck(evt, element)) {
		return false;
	}

	// ignore pdf links
	if (/.pdf/.test(element.href.toLowerCase())) {
		return false;
	}

	// additional (besides .no-barba) ignore links with these classes
	var ignoreClasses = ['ext-link', 'another-class-here'];
	for (var i = 0; i < ignoreClasses.length; i++) {
		if (element.classList.contains(ignoreClasses[i])) {
			return false;
		}
	}

	return true;
};


var split = new Split();

});


var Split = function() {
  this.$t = jQuery(".split");
  this.gridX = 10;
  this.gridY = 10;
  this.w = this.$t.width();
  this.h = this.$t.height();
  this.img = jQuery("img", this.$t).attr("src");
  this.delay = 0.13;

  this.create = function() {
    jQuery("div", this.$t).remove();

      for (x = 0; x < this.gridX; x++) {
      for (y = 0; y < this.gridY; y++) {
          var width = this.w / this.gridX * 101 / this.w + "%",
              height = this.h / this.gridY * 101 / this.h + "%",
              top = this.h / this.gridY * y * 100 / this.h + "%",
              left = this.w / this.gridX * x * 100 / this.w + "%",
              bgPosX = -(this.w / this.gridX * x) + "px",
              bgPosY = -(this.h / this.gridY * y) + "px";

              jQuery("<div />")
          .css({
          top: top,
          left: left,
          width: width,
          height: height,
          backgroundImage: "url(" + this.img + ")",
          backgroundPosition: bgPosX + " " + bgPosY,
          backgroundSize: this.w + "px",
          transitionDelay: x * this.delay + y * this.delay + "s"
          })
          .appendTo(this.$t);
      }
      }
  };

  this.create();
  jQuery(".split").addClass("active");
  setInterval(function(){ 
    jQuery(".split").toggleClass("active");

   }, 3000);
  };

 