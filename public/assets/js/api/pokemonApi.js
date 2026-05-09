const POKE_API_URL = 'https://pokeapi.co/api/v2/pokemon';

const LOCAL_API_URL =
    '/pokemon-api-php-clean-architecture/public';

function getPokemonList(limit = 10) {

    return $.ajax({
        url: `${POKE_API_URL}?limit=${limit}`,
        method: 'GET'
    });
}

function getPokemonById(id) {

    return $.ajax({
        url: `${POKE_API_URL}/${id}`,
        method: 'GET'
    });
}

function savePokemon(data) {

    return $.ajax({

        url: `${LOCAL_API_URL}/pokemon`,

        method: 'POST',

        contentType: 'application/json',

        data: JSON.stringify(data)
    });
}

function deletePokemon(number) {

    return $.ajax({
        url: `${LOCAL_API_URL}/pokemon`,
        method: 'DELETE',
        data: {
            number: number
        }
    });
}

function sendPokemonMail(data) {

    return $.ajax({
        url: `${LOCAL_API_URL}/mail`,
        method: 'POST',
        data: data
    });
}