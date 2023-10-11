import autores from "./Autor.js";

const validatorIdAutor = async (id) => {

    const autoresResultado = await autores.findById(id);

    return autoresResultado;
};

export default validatorIdAutor;