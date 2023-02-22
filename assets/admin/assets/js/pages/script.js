//  update hero
$(".edit-hero").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/hero/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_hero: id,
		},
		success: function (data) {
			$(".idhero").val(data.id_hero);
			$(".heroheadingedit").val(data.hero_heading);
			$(".herocontentedit").val(data.hero_content);
			$(".oldhero1").val(data.hero_img_1);
			$(".hero1now").attr(
				"src",
				"../assets/upload/web-img/hero/" + data.hero_img_1
			);
			$(".oldhero2").val(data.hero_img_2);
			$(".hero2now").attr(
				"src",
				"../assets/upload/web-img/hero/" + data.hero_img_2
			);
			$(".oldhero3").val(data.hero_img_3);
			$(".hero3now").attr(
				"src",
				"../assets/upload/web-img/hero/" + data.hero_img_3
			);
		},
	});

	$("#editHero").modal("show");
});

//  update about
$(".edit-about").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/about/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_about: id,
		},
		success: function (data) {
			$(".idabout").val(data.id_about);
			$(".headingedit").val(data.about_heading);
			$(".contentedit").val(data.about_content);
			$(".desc1edit").val(data.desc_1);
			$(".desc2edit").val(data.desc_2);
			$(".desc3edit").val(data.desc_3);
			$(".desc4edit").val(data.desc_4);
			$(".desc5edit").val(data.desc_5);
			$(".desc6edit").val(data.desc_6);
			$(".oldaboutimg").val(data.about_img);
			$(".gambaraboutedit").attr(
				"src",
				"../assets/upload/web-img/about/" + data.about_img
			);
		},
	});

	$("#editAbout").modal("show");
});

//  update merk
$(".edit-merk").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/merk/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_merk: id,
		},
		success: function (data) {
			$(".idmerk").val(data.id_merk);
			$(".merkname").val(data.nama_merk);
			$(".oldmerkimg").val(data.merk_img);
			$(".gambarmerkedit").attr(
				"src",
				"../assets/upload/merk/" + data.merk_img
			);
		},
	});

	$("#editMerk").modal("show");
});

//  update kategori
$(".edit-category").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/category/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_category: id,
		},
		success: function (data) {
			$(".idcategory").val(data.id_category);
			$(".categoryname").val(data.category_name);
			$(".oldcategoryimg").val(data.category_img);
			$(".gambaredit").attr(
				"src",
				"../assets/upload/category/" + data.category_img
			);
		},
	});

	$("#editCategory").modal("show");
});

//  update subkategori
$(".edit-subcategory").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/subcategory/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_subcategory: id,
		},
		success: function (data) {
			$(".categoryidedit").val(data.id_category).trigger("change");
			$(".subid").val(data.id_subcategory);
			$(".subname").val(data.sub_name);
			$(".oldsubimg").val(data.sub_img);
			$(".gambarsubedit").attr(
				"src",
				"../assets/upload/sub-category/" + data.sub_img
			);
		},
	});

	$("#editSubcategory").modal("show");
});

//  update produk
$(".edit-product").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/product/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_product: id,
		},
		success: function (data) {
			$(".idproduk").val(data.id_product);
			$(".tipeprodukedit").val(data.product_type);
			$(".namaprodukedit").val(data.product_name);
			$(".merkprodukedit").val(data.merk_id).trigger("change");
			$(".kategoriprodukedit").val(data.category_id).trigger("change");
			$(".oldprodimg").val(data.product_img);
			$(".gambarproductedit").attr(
				"src",
				"../assets/upload/product/" + data.product_img
			);
		},
	});

	$("#editProduct").modal("show");
});

//  update profile
$(".edit-profile").on("click", function (e) {
	e.preventDefault();
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/mts/admin/profile/getId",
		type: "POST",
		dataType: "json",
		data: {
			id_user: id,
		},
		success: function (data) {
			console.log(data);
			$(".iduser").val(data.id_user);
			$(".namauser").val(data.nama_user);
			$(".notelp").val(data.notelp);
			$(".username").val(data.username);
			$(".oldprofileimg").val(data.user_img);
			$(".profileimg").attr(
				"src",
				"../assets/admin/assets/img/user-image/" + data.user_img
			);
			$(".keteranganedit").val(data.keterangan);
		},
	});

	$(".currentpassword").on("input", function () {
		if ($(this).val().length >= 5) {
			$(".newpassword").prop("readonly", false);
			$(".newpassword").prop("required", true);
		} else {
			$(".newpassword").prop("readonly", true);
			$(".newpassword").prop("required", false);
		}
	});

	$("#editprofile").modal("show");
});
