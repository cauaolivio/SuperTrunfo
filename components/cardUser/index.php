<div class="container-user">
  <span class="point-user"></span>
  <div class="cards-container">
    <div class="main-card-content card">
      <div class="card-front">
        <div class="card-front-content">
          <div class="header-content">
            <img id="imagePlayer" src="../assets/StandardCar.jpg" alt="Foto do Carro">
            <span id="namePlayer">Nome do carro</span>
          </div>
          <div class="body-content">
            <div class="atr-item">
              <div>
                <input class="atr-radio" type="radio" name="atr" id="inpPotency" value="potencia">
                <span class="atr-name">Potência</span>
              </div>
              <span class="atr-value" id="potencyPlayer">Potência</span>
            </div>
            <div class="atr-item">
              <div>
                <input class="atr-radio" type="radio" name="atr" id="inpMotor" value="motor">
                <span class="atr-name">Motor</span>
              </div>
              <span class="atr-value" id="motorPlayer">Motor</span>
            </div>
            <div class="atr-item">
              <div>
                <input class="atr-radio" type="radio" name="atr" id="inpMaxSpeed" value="velocidade_maxima">
                <span class="atr-name">Velocidade Máx.</span>
              </div>
              <span class="atr-value" id="maxSpeedPlayer">Vel. Máx.</span>
            </div>
            <div class="atr-item">
              <div>
                <input class="atr-radio" type="radio" name="atr" id="inpTime" value="tempo_zero_cem">
                <span class="atr-name">0 km/h a 100 km/h</span>
              </div>
              <span class="atr-value" id="timePlayer">Tempo</span>
            </div>
            <div class="atr-item">
              <div>
                <input class="atr-radio" type="radio" name="atr" id="inpWeight" value="peso">
                <span class="atr-name">Peso</span>
              </div>
              <span class="atr-value" id="weightPlayer">Peso</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-back">
        <h2><span>Super</span>Trunfo</h2>
      </div>
    </div>
    
    <div class="left-card-content card-secondary card">
      <h2><span>S</span>T</h2>
      <img class="arrow-left" src="../assets/arrow-left.png" onClick="changeCard(-1)" alt="Seta à esquerda">
    </div>
    
    <div class="right-card-content card-secondary card">
      <h2><span>S</span>T</h2>
      <img class="arrow-right" src="../assets/arrow-right.png" onClick="changeCard(1)" alt="Seta à direita">
    </div>
  </div>
</div>
