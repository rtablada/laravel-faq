$('.question').on 'click', (vent) ->
	$this = $(@)
	$this.find('dd').slideToggle()
	$this.siblings('.question').find('dd').slideUp()
