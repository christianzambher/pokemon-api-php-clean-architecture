const appState = {
    registeredPokemons: []
};

async function initializeApp() {

    try {

        const registeredResponse =
            await getRegisteredPokemons();

        appState.registeredPokemons =
            registeredResponse.data;

        const response =
            await getPokemonList();

        renderPokemonList(response.results);

         response.results.forEach(pokemon => {

            const pokemonId =
                pokemon.url.split('/')[6];

            loadPokemonAbilities(
                pokemon.url,
                pokemonId
            );
        });

    } catch (error) {

        console.error(error);

        showErrorAlert(
            'Error loading Pokemons'
        );
    }
}

initializeApp();