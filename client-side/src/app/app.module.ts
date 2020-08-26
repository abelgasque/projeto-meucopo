import { BrowserModule } from '@angular/platform-browser';
import { NgModule, LOCALE_ID } from '@angular/core';
import { HttpClientModule} from '@angular/common/http';
import localePt from '@angular/common/locales/pt';
import { LocationStrategy, HashLocationStrategy, registerLocaleData } from '@angular/common';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { FormsModule } from '@angular/forms';

import {ButtonModule} from 'primeng/button';
import {TableModule} from 'primeng/table';
import {InputTextModule} from 'primeng/inputtext';
import {InputMaskModule} from 'primeng/inputmask';
import {DialogModule} from 'primeng/dialog';
import {ToastModule} from 'primeng/toast';
import {ConfirmDialogModule} from 'primeng/confirmdialog';
import {ConfirmationService} from 'primeng/api';

import { AppComponent } from './app.component';
import { AppService } from './app.service';
import { MessageService } from 'primeng/api';


registerLocaleData(localePt);

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,
    FormsModule,

    TableModule,
    ButtonModule,
    InputTextModule,
    InputMaskModule,
    DialogModule,
    ToastModule,
    ConfirmDialogModule
  ],
  providers: [
    AppService,

    ConfirmationService,
    MessageService,
    { provide: LOCALE_ID, useValue: 'pt' },
    { provide: LocationStrategy, useClass: HashLocationStrategy }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
