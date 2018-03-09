import { Component, OnInit } from '@angular/core';
import { DialogService } from "../shared/dialog.service";
import { MealService } from "./meal.service";
import { Meal } from "./meal";

@Component({
  selector: 'app-meal',
  templateUrl: './meal.component.html',
  styleUrls: ['./meal.component.scss']
})
export class MealComponent implements OnInit {

  weekdayArray: string[] = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  selectedMeal: Meal = { uuid: "", title: "", description: "", weekday: this.weekdayArray[0] };
  mealList: Meal[];

  constructor(
    private readonly dialogService: DialogService,
    private readonly mealService: MealService) {
  }

  ngOnInit() {
    this.mealService.mealList.subscribe(mealList => {
      if (mealList) {
        this.mealList = mealList;
        this.setSelectedMeal();
      }
    });

    this.mealService.LoadMealList();
  }
  
  public selectWeekday(weekday: string): void {
    let selectedMeal = this.mealList.find(meal => meal.weekday === weekday);
    if (selectedMeal) {
      this.selectedMeal = selectedMeal;
    }
  }

  public editTitle(): void {
    console.log("Pressed editTitle");
    this.dialogService.openDialog();
  }

  public editDescription(): void {
    console.log("Pressed editDescription");
    this.dialogService.openDialog();
  }

  private setSelectedMeal(): void {
    if (this.mealList.length > 0) {
      let today = new Date();
      let weekday = this.weekdayArray[today.getDay()];

      let todayMeal = this.mealList.find(meal => meal.weekday === weekday);
      if (todayMeal) {
        this.selectedMeal = todayMeal;
      }
    }
  }
}
