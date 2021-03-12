class RapportHebdo{
    constructor(){
        this.positiveBar = document.getElementsByClassName('barre-pos')[0];
        this.negativeBar = document.getElementsByClassName('barre-neg')[0];

        this.getPercentageValues();
    }

    getPercentageValues(){
        let posVal = parseInt(this.positiveBar.dataset.value);
        let negVal = parseInt(this.negativeBar.dataset.value);
        
        const total = posVal + Math.abs(negVal);
        const posPercent = (posVal / total) * 100;
        const negPercent = (Math.abs(negVal) / total) * 100;
        
        this.setElementsWidth(posPercent, negPercent);
    }

    setElementsWidth(pos, neg){
        this.positiveBar.style.width = `${pos}%`;
        this.negativeBar.style.width = `${neg}%`;
    }
}

export default RapportHebdo;