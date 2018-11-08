import { TestBed } from '@angular/core/testing';

import { EmptyCartService } from './empty-cart.service';

describe('EmptyCartService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EmptyCartService = TestBed.get(EmptyCartService);
    expect(service).toBeTruthy();
  });
});
