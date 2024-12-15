document.addEventListener("DOMContentLoaded", function () {
    const kehadiranSelect = document.getElementById("kehadiran");
    const keteranganGroup = document.getElementById("keterangan-group");

    // Debugging: cek elemen
    console.log(kehadiranSelect); // Harus menampilkan elemen select
    console.log(keteranganGroup); // Harus menampilkan elemen keterangan-group

    function toggleKeterangan() {
        console.log("Kehadiran:", kehadiranSelect.value); // Debug nilai dropdown
        if (kehadiranSelect.value !== "Hadir") {
            keteranganGroup.style.display = "block";
        } else {
            keteranganGroup.style.display = "none";
        }
    }

    // Panggil fungsi saat halaman dimuat
    toggleKeterangan();

    // Tambahkan event listener untuk perubahan pilihan
    kehadiranSelect.addEventListener("change", toggleKeterangan);
});
