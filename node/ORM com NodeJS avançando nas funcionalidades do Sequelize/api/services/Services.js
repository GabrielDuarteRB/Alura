const database = require('../models/index.js');

class Services {
  constructor(nomeDoModelo) {
    this.nomeDoModelo = nomeDoModelo;
  };

  async pegaTodosOsRegistros() {
    console.log('teste');
    return database[this.nomeDoModelo].findAll();
  };

  async atualizaRegistros(dadosAtualizados, id, transacao = {}) {
    return database[this.nomeDoModelo].update(dadosAtualizados, 
      { where: { id: id } },
      transacao
    )
  }

  async atualizaRegistros(dadosAtualizados, where, id, transacao = {}) {
    return database[this.nomeDoModelo].update(dadosAtualizados, 
      { where: { ...where } },
      transacao
    )
  }

}

module.exports = Services