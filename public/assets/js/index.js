$('#timer').yycountdown({
	endDateTime   : '2018/02/25 08:40:00',
	unit          : {d: '日', h: '時間', m: '分', s: '秒'},
	complete      : function(_this) {
						this.find('.yycountdown-box').fadeOut();
					}
	});