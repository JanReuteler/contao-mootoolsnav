var MootoolsNav = new Class({

	Implements: [Options],
	Binds: ['toggle', 'open', 'close'],

	options: {
		level: 1,
		event: 'click',
		direction: 'bottom',
		keepOpen: false
	},

	initialize: function(container, options)
	{
		this.setOptions(options);

		this.container = document.getElement(container);

		if (this.options.event == 'click')
		{
			this.eventElements = this.container.getElements(('.level_' + this.options.level + ' > li.submenu > a, .level_' + this.options.level + ' > li.submenu > span'));
			this.eventElements.addEvent('click', this.toggle);
			this.submenus = this.eventElements.getNext('ul');
		}
		else if (this.options.event == 'mouseover')
		{
			this.eventElements = this.container.getElements(('.level_' + this.options.level + ' > li.submenu'));
			this.eventElements.addEvents({
				'mouseenter': this.open,
				'mouseleave': this.close
			});
			this.submenus = this.eventElements.getChildren('ul');
			console.log(this.eventsElements);
		}

		this.submenus.each(function (submenu)
		{
			//alert(options.direction);
			if(options.direction == 'bottom') {
				submenu.set('slide', { mode: 'vertical', duration: 500, resetHeight:true, link:'cancel'  }).slide('hide');

			} else if(options.direction == 'right') {
				submenu.set('slide', { mode: 'horizontal', duration: 500, resetHeight:true, link:'cancel'  }).slide('hide');

			}
			//submenu.set('slide', { mode: 'horizontal', duration: 500, resetHeight:true, link:'cancel'  }).slide('hide');
			//submenu.slide('hide');

		}.bind(this));

	},

	toggle: function(event)
	{
/*
		var el = event.target,


		if (!submenu)
			return;

*/



		return false;
	},

	open: function(event)
	{
		var submenu = this.getSubmenu(event.target);

		if (submenu)
		{
			if (!this.options.keepOpen)
			{
				var current = this.submenus.indexOf(submenu);

				for( var i=0; i<this.submenus.length; i++ )
				{
					if (i != current)
					{
						this.submenus[i].slide('out');
						this.submenus[i].store('isOpen', false);
					}
				}
			}

			console.log('open');
			submenu.slide('in');
		}

		return false;
	},

	close: function(event)
	{
		var submenu = this.getSubmenu(event.target);

		if (submenu)
		{
			submenu.slide('out');
			return false;
		}
	},

	getSubmenu: function(el)
	{
		return el.get('tag') == 'li' ? el.getElement('ul') : el.getNext('div > ul');
	}
});



