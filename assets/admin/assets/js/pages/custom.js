// custom sweetalert2 popup
const userlogin = $(".userlogin").data("flashdata");

if (userlogin) {
	Swal.fire({
		icon: "success",
		title: "Login berhasil!",
		text: userlogin,
	});
}

const samefailed = $(".samefailed").data("flashdata");

if (samefailed) {
	Swal.fire({
		icon: "error",
		title: "Oops...!",
		text: samefailed,
	});
}

const failed = $(".failed").data("flashdata");

if (failed) {
	Swal.fire({
		icon: "error",
		title: "Oops...!",
		text: failed,
	});
}

const failedupload = $(".failedupload").data("flashdata");

if (failedupload) {
	Swal.fire({
		icon: "success",
		title: "Success!",
		text: failedupload,
	});
}

const inserted = $(".inserted").data("flashdata");

if (inserted) {
	Swal.fire({
		icon: "success",
		title: "Success!",
		text: inserted,
	});
}

const updated = $(".updated").data("flashdata");

if (updated) {
	Swal.fire({
		icon: "success",
		title: "Updated!",
		text: updated,
	});
}

const deleted = $(".deleted").data("flashdata");

if (deleted) {
	Swal.fire({
		icon: "success",
		title: "Deleted!",
		text: deleted,
	});
}
// end custom sweetalert2 popup

// custom datatable
$("#dataCategory").DataTable({
	processing: true,
	serverside: true,
	lengthChange: false,
	language: {
		searchPlaceholder: "Cari Kategori..",
		search: "",
	},
});

$("#dataMerk").DataTable({
	processing: true,
	serverside: true,
	lengthChange: false,
	language: {
		searchPlaceholder: "Cari Merk..",
		search: "",
	},
});

$("#dataProduk").DataTable({
	processing: true,
	serverside: true,
	lengthChange: false,
	language: {
		searchPlaceholder: "Cari Produk..",
		search: "",
	},
});
// end custom datatable

$(".btn-delete").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin ?",
		text: "Data akan di hapus!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Batal",
		confirmButtonText: "Ya, Hapus !",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
// end custom sweetalert popup

// custom-file-input label onChange
$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});
// end custom-file-input label onChange

// add focus on input when modal show
$("#addHero").on("shown.bs.modal", function () {
	$('input[name="heroheading"]').focus();
});

$("#addAbout").on("shown.bs.modal", function () {
	$('input[name="heading"]').focus();
});

$("#addCategory").on("shown.bs.modal", function () {
	$('input[name="category"]').focus();
});

$("#addMerk").on("shown.bs.modal", function () {
	$('input[name="merk"]').focus();
});

$("#addProduct").on("shown.bs.modal", function () {
	$('input[name="tipeproduk"]').focus();
});
// end add focus on input when modal show
