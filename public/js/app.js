var Faq;

Faq = Ember.Application.create();

$('.question').on('click', function(vent) {
  var $this;
  $this = $(this);
  $this.find('dd').slideToggle();
  return $this.siblings('.question').find('dd').slideUp();
});
