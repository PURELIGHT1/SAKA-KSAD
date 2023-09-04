//SWAL ALERT
const flashData = $('.flash-data').data('flashdata');
if(flashData){
	swal("Data" , "berhasil" + flashData, {
		icon : "success",
		buttons: false,
		timer: 1500,
	});
}
