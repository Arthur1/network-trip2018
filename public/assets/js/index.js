$('#timer').yycountdown({
	startDateTime : '2018/02/24 00:00:00',
	endDateTime   : '2018/02/25 00:08:40',
	unit          : {d: '日', h: '時間', m: '分', s: '秒'},
	complete      : function(_this) {
						this.find('.yycountdown-box').fadeOut();
					}
	});