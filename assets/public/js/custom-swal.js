const dataelmsuccess = document.getElementById("mailsuccess");
const mailsuccess = dataelmsuccess.getAttribute("data-flashdata");

if (mailsuccess) {
	Swal.fire({
		icon: "success",
		title: "Success!",
		text: mailsuccess,
	});
}

const dataelmfail = document.getElementById("mailfailed");
const mailfailed = dataelmfail.getAttribute("data-flashdata");

if (mailfailed) {
	Swal.fire({
		icon: "error",
		title: "Oops!",
		text: mailfailed,
	});
}
