function loginCheck() {
    $.ajax({
        type: 'GET',
        url: "http://localhost/MangaList1/MangaLogin.php",

        success: function (loggedOn) {
            if (loggedOn == 1) {
                $("#loginButton").hide();
                $("#logoutButton").show();
            } else {
                $("#loginButton").show();
                $("#logoutButton").hide();
            }
        }

    });
}

function logout() {
    $.ajax({
        type: 'GET',
        url: "http://localhost/MangaList1/MangaLogout.php",

        success: function (loggedOn) {
            $("#loginButton").show();
            $("#logoutButton").hide();
            $("#list").html("")
        }

    });
}

function GetMangaList() {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetMangaList.php",
        success: function (List) {
            $("#list").html(List)
        }

    });
}

function MangaList(type) {
    if (typeof type == "undefined") type = "all"
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/MangaList.php",
        data: {
            type: type
        },
        success: function (List) {
            switch(type) {
                case "all":
                    $("#all").html(List)
                    break;
                case "manga":
                    $("#manga").html(List)
                    break;
                case "lightnovels":
                    $("#light_novels").html(List)
                    break;
                case "manhwa":
                    $("#manhwa").html(List)
                    break;
                case "manhua":
                    $("#manhua").html(List)
                    break;
            }
        }

    });
}

function MangaMyList(status) {
    if (typeof type == "undefined") type = "all"
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/MangaMyList.php",
        data: {
            status: status
        },
        success: function (List) {
            switch(status) {
                case "all":
                    $("#all").html(List)
                    break;
                case "reading":
                    $("#reading").html(List)
                    break;
                case "completed":
                    $("#completed").html(List)
                    break;
                case "on_hold":
                    $("#on_hold").html(List)
                    break;
                case "dropped":
                    $("#dropped").html(List)
                    break;
                case "plan_to_read":
                    $("#plan_to_read").html(List)
                    break;
            }
        }

    });
}

function AnimeList(type) {
    if (typeof type == "undefined") type = "all"
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/AnimeList.php",
        data: {
            type: type
        },
        success: function (List) {
            switch(type) {
                case "all":
                    $("#all").html(List)
                    break;
                case "tv":
                    $("#tv").html(List)
                    break;
                case "ova":
                    $("#ova").html(List)
                    break;
                case "movie":
                    $("#movie").html(List)
                    break;
            }
        }

    });
}
function AnimeMyList(status) {
    if (typeof type == "undefined") type = "all"
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/AnimeMyList.php",
        data: {
            status: status
        },
        success: function (List) {
            switch(status) {
                case "all":
                    $("#all").html(List)
                    break;
                case "watching":
                    $("#watching").html(List)
                    break;
                case "completed":
                    $("#completed").html(List)
                    break;
                case "on_hold":
                    $("#on_hold").html(List)
                    break;
                case "dropped":
                    $("#dropped").html(List)
                    break;
                case "plan_to_watch":
                    $("#plan_to_watch").html(List)
                    break;
            }
        }

    });
}

function GetAnimeList() {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetAnimeList.php",
        success: function (List) {

            $("#list").html(List)
        }

    });
}

function search() {

    var searchInput = $("#searchInput").val()
    var searchType = $("#searchType").val()
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/Search.php",
        data: {
            searchInput: searchInput,
            searchType: searchType
        },
        success: function (List) {

            $("#list").html(List)
        }

    });
}

function GetMangaMyList(status) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetMangaMyList.php",
        success: function (List) {

            $("#list").html(List)
        }

    });
}function GetAnimeMyList() {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetAnimeMyList.php",

        success: function (List) {
            $("#list").html(List)
        }

    });
}

function GetSeasonalAnime() {
    $.ajax({
        type: 'GET',
        url: "http://localhost/MangaList1/GetSeasonalAnime.php",

        success: function (List) {
            $("#list").html(List)
        }

    });

}

function GetMangaDetails(mangaID) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetMangaDetails.php",
        data: {
            mangaID: mangaID
        },
        success: function (List) {
            $("#list").html(List)
        }

    });
}

function UpdateMyList(ID,type) {
    var score = $("#scoreSelect").val()
    var status = $("#statusSelect").val()
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/UpdateMyList.php",
        data: {
            ID: ID,
            status: status,
            score: score,
            type:type
        },
        success: function (List) {
            if(type=="manga") {
                GetMangaDetails(ID)
            }
            else if(type=="anime"){
                GetAnimeDetails(ID)
            }
        }

    });

}

function DeleteFromList(ID,type) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/DeleteFromList.php",
        data: {
            ID: ID,
            type:type
        },
        success: function (List) {
            if(type=="manga") {
                GetMangaDetails(ID)
            }
            else if(type=="anime"){
                GetAnimeDetails(ID)
            }
        }

    });
}

function GetAnimeDetails(AnimeID) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/MangaList1/GetAnimeDetails.php",
        data: {
            AnimeID: AnimeID
        },
        success: function (List) {
            $("#list").html(List)
        }

    });
}



