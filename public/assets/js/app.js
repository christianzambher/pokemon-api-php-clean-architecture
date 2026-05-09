$(document).ready(async function () {

    const appState = {
        registeredPokemons: []
    };

    try {

        const response = await getPokemonList();

        renderPokemonList(response.results);

        response.results.forEach(pokemon => {

            const pokemonId = pokemon.url.split('/')[6];

            loadPokemonAbilities(
                pokemon.url,
                pokemonId
            );
        });

    } catch (error) {
        showErrorAlert(
            'Algo ha salido mal'
        );
    }
});