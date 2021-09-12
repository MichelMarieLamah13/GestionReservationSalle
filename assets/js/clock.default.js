// analog clock - image 3
var clockObj9 = new dyClock(".dyclock-analog-9", {

	clock: "analog",

	format: "hh:mm:ss A",
	digitalStyle: {
		fontColor: "black",
		fontFamily: 'Monofett',
		fontSize: 32,
	},


	image: "media/img/c03.png",
	showdigital: true,
	radius: 120,
	analogStyle: {
		backgroundColor: "#eee",
		border: '1px solid #999',
		handsColor: {
			h: "red",
			m: "orange",
			s: "green"
		},
		handsWidth: {
			h: 9,
			m: 5,
			s: 2
		},
		roundHands: true,
		shape: "circle"
	}

});
clockObj9.start();
