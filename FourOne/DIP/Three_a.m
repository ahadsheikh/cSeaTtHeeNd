img = imread("assets/cameraman.tif");
subplot(1, 2, 1), imshow(img), title("Original image");
img_noise = imnoise(img,'salt & pepper')
subplot(1, 2, 2), imshow(img_noise), title("Noise Image");