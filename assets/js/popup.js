class Popup{
    constructor(){
        this.isExpenseOpen = false;
        this.expenseButton = document.getElementById('add-expense-toggler');
        this.expenseContainer = document.getElementById('add-expense');

        this.isCategorieOpen = false;
        this.categorieButton = document.getElementById('add-categorie-toggler');
        this.categorieContainer = document.getElementById('add-categorie');

        this.addEvents();
    }

    addEvents(){
        this.expenseButton.addEventListener('click', () => {
            this.isExpenseOpen = !this.isExpenseOpen;
            this.expenseContainer.classList.add(this.isExpenseOpen ? 'add-expense--open' : 'add-expense--close');
            this.expenseContainer.classList.remove(this.isExpenseOpen ? 'add-expense--close' : 'add-expense--open'); 

            this.isCategorieOpen = false;
            this.categorieContainer.classList.add('add-categorie--close');
            this.categorieContainer.classList.remove('add-categorie--open'); 
        })

        this.categorieButton.addEventListener('click', () => {
            this.isCategorieOpen = !this.isCategorieOpen;
            this.categorieContainer.classList.add(this.isCategorieOpen ? 'add-categorie--open' : 'add-categorie--close');
            this.categorieContainer.classList.remove(this.isCategorieOpen ? 'add-categorie--close' : 'add-categorie--open'); 
        
        
            this.isExpenseOpen = false;
            this.expenseContainer.classList.add('add-expense--close');
            this.expenseContainer.classList.remove('add-expense--open'); 
        });
    }
}

export default Popup;