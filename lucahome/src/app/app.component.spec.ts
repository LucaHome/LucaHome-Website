import { TestBed, async } from '@angular/core/testing';
import { Observable } from 'rxjs/Observable';
import "rxjs/add/observable/of";

import { Mock } from "./mock";

import { AppComponent } from './app.component';
import { FooterComponent } from "./footer/footer.component";
import { MapComponent } from "./map/map.component";
import { MealComponent } from "./meal/meal.component";
import { SecurityComponent } from "./security/security.component";
import { ShoppingComponent } from "./shopping/shopping.component";
import { TemperatureComponent } from "./temperature/temperature.component";
import { UserComponent } from "./user/user.component";

import { DialogService } from "./shared/dialog.service";
import { MealService } from "./meal/meal.service";
import { SecurityService } from "./security/security.service";
import { ShoppingService } from "./shopping/shopping.service";
import { TemperatureService } from "./temperature/temperature.service";
import { UserProviderService } from "./user/user-provider.service";

describe('AppComponent', () => {
  let dialogServiceMock = jasmine.createSpyObj<DialogService>("DialogService", Mock.dialogServiceMock);
  let mealServiceMock = jasmine.createSpyObj<MealService>("MealService", Mock.mealServiceMock);
  let securityServiceMock = jasmine.createSpyObj<SecurityService>("SecurityService", Mock.securityServiceMock);
  let shoppingServiceMock = jasmine.createSpyObj<ShoppingService>("ShoppingService", Mock.shoppingServiceMock);
  let temperatureServiceMock = jasmine.createSpyObj<TemperatureService>("TemperatureService", Mock.temperatureServiceMock);
  let userProviderServiceMock = jasmine.createSpyObj<UserProviderService>("UserProviderService", Mock.userProviderServiceMock);

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [
        AppComponent,
        FooterComponent,
        MapComponent,
        MealComponent,
        SecurityComponent,
        ShoppingComponent,
        TemperatureComponent,
        UserComponent
      ],
      providers: [
        { provide: DialogService, useValue: dialogServiceMock },
        { provide: MealService, useValue: mealServiceMock },
        { provide: SecurityService, useValue: securityServiceMock },
        { provide: ShoppingService, useValue: shoppingServiceMock },
        { provide: TemperatureService, useValue: temperatureServiceMock },
        { provide: UserProviderService, useValue: userProviderServiceMock }
      ]
    }).compileComponents();
  }));

  it('should create the app', async(() => {
    const fixture = TestBed.createComponent(AppComponent);
    const app = fixture.debugElement.componentInstance;
    expect(app).toBeTruthy();
  }));

  it(`should have as title 'LucaHome'`, async(() => {
    const fixture = TestBed.createComponent(AppComponent);
    const app = fixture.debugElement.componentInstance;
    expect(app.title).toEqual('LucaHome');
  }));
});
