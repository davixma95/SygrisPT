    // The function correctly processes a 2x2 array.
    it('para arrays de 2x2', () => {
        const array = [[1, 2], [4, 3]];
        const expected = [1, 2, 3, 4];
        expect(snail(array)).toEqual(expected);
    });

it('para arrays de 3x3', () => {
        const array = [[1, 2, 3], [8, 9, 4], [7, 6, 5]];
        const expected = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        expect(snail(array)).toEqual(expected);
    });

it('Deberia esperar 1 array vacío', () => {
        const array = [];
        const expected = [];
        expect(snail(array)).toEqual(expected);
    });
