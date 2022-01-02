grayImage = imread('assets/cameraman.tif');
[row, column, numOfColorBands] = size(grayImage);

subplot(2, 1, 1);
imshow(grayImage, []);
fontSize = 20;
title('Original Grayscale Image', 'FontSize', fontSize, 'Interpreter', 'None');


% Display the original gray scale image.
subplot(2, 1, 2);
F=fft2(grayImage);
S=fftshift(log(1+abs(F)));
imshow(S,[]);
title('Spectrum Image', 'FontSize', fontSize, 'Interpreter', 'None');